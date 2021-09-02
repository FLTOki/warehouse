<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use SplFileInfo;
use Symfony\Component\Finder\SplFileInfo as FinderSplFileInfo;

class SiteWideSearchController extends Controller
{

    const BUFFER = 10;
    private function modelNamespacePrefix()
    {
        return app()->getNamespace() . 'Models\\';
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        $toExclude = [
            Profile::class,
        ];

        $files = File::allFiles(app()->basePath() . '/app/Models');

        $results = collect($files)->map(function (FinderSplFileInfo $file){
            $filename = $file->getRelativePathname();

            if (substr($filename, -4) !== '.php') {
                # code...
                return null;
            }
            return substr($filename, 0, -4);
        })->filter(function (?string $classname) use($toExclude){
            if ($classname === null) {
                # code...
                return false;
            }

            $reflection = new \ReflectionClass($this->modelNamespacePrefix() . $classname);

            $isModel = $reflection->isSubclassOf(Model::class);
            $searchable = $reflection->hasMethod('search');

            return $isModel && $searchable && !in_array($reflection->getName(), $toExclude, true);

        })->map(function ($classname) use ($keyword){
            $model = app( $this->modelNamespacePrefix() . $classname);

            $fields = array_filter($model::SEARCHABLE_FIELDS, fn($field) => $field !== 'id');

            return $model::search($keyword)->get()->map(function ($modelRecord) use ($fields, $keyword, $classname){

                $fieldsData = $modelRecord->only($fields);

                $serializedValues = collect($fieldsData)->join('');

                $searchPos = strpos(strtolower($serializedValues), strtolower($keyword));

                if ($searchPos !== false) {
                    # code...
                    $start = $searchPos - self::BUFFER;
                    $start = $start <0 ? 0 : $start;

                    $length = strlen($keyword) + 2 * self::BUFFER;

                    $sliced = substr($serializedValues, $start, $length);

                    $shouldAddPrefix = $start > 0;
                    $shouldAddPostfix = ($start + $length) < strlen($serializedValues);

                    $sliced = $shouldAddPrefix ? '...' . $sliced : $sliced;
                    $sliced = $shouldAddPostfix ? $sliced . '...' : $sliced; 

                }

                $modelRecord->setAttribute('match', $sliced ?? substr($serializedValues, 0, 2 * self::BUFFER) . '...');
                $modelRecord->setAttribute('model', $classname);
                $modelRecord->setAttribute('view_link', $this->resolveModelViewLink($modelRecord));
                return $modelRecord;
            });
        });

        dd($results);
    }

    private function resolveModelViewLink(Model $model)
    {
        # code...
        $mapping = [
            Post::class => '/p/{id}'
        ];

        $modelClass = get_class($model);

        if (Arr::has($mapping, $modelClass)) {
            return URL::to(str_replace('{id}', $model->id, $mapping[$modelClass]));
        }

        $modelName = Str::plural(Arr::last(explode('\\', $modelClass)));
        $modelName = Str::kebab(Str::camel($modelName));

        return URL::to('/' . $modelName . '/' . $model->id);
    }
}
