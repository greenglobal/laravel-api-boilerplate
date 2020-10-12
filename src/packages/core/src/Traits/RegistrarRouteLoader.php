<?php

namespace GGPHP\Core\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class RegistrarRouteLoader.
 *
 * @author  Kun <nguyentruongthanh.dn@gmail.com>
 */
trait RegistrarRouteLoader
{

    /**
     * Register all the containers routes files in the framework
     */
    public function runRoutesAutoLoader()
    {
        $containersPaths = Apiato::getContainersPaths();
        $containersNamespace = Apiato::getContainersNamespace();

        foreach ($containersPaths as $containerPath) {
            $this->loadRoutes($containerPath, $containersNamespace);
        }
    }

    /**
     * Register the Containers API routes files
     *
     * @param $containerPath
     * @param $containersNamespace
     */
    private function loadContainerRoutes($containerPath, $containersNamespace)
    {
        // build the container api routes path
        $apiRoutesPath = $containerPath . '/UI/API/Routes';
        // build the namespace from the path
        $controllerNamespace = $containersNamespace . '\\Containers\\' . basename($containerPath) . '\\UI\API\Controllers';

        if (File::isDirectory($apiRoutesPath)) {
            $files = File::allFiles($apiRoutesPath);
            $files = Arr::sort($files, function ($file) {
                return $file->getFilename();
            });
            foreach ($files as $file) {
                $this->loadApiRoute($file, $controllerNamespace);
            }
        }
    }

    /**
     * @param \Symfony\Component\Finder\SplFileInfo $file
     *
     * @return  mixed
     */
    private function getRouteFileNameWithoutExtension(SplFileInfo $file)
    {
        $fileInfo = pathinfo($file->getFileName());

        return $fileInfo['filename'];
    }

}
