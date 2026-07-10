<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Enums\AlignPosition;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Enums\ImageDriver;
use Spatie\Image\Enums\Unit;
use Spatie\Image\Image;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $w;

    private $h;

    private $fileName;

    private $path;

    public function __construct($filePath, $w, $h)
    {

        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path().'/app/public/'.$this->path.'/'.$this->fileName;
        $destPath = storage_path().'/app/public/'.$this->path."/crop_{$w}x{$h}_".$this->fileName;

        $canvas = Image::useImageDriver(ImageDriver::Gd)->load($srcPath)
            ->background('#dad7ce')
            ->fit(Fit::Crop, $w, $h)
            ->blur(85);

        $foreground = Image::useImageDriver(ImageDriver::Gd)->load($srcPath)
            ->background('#dad7ce')
            ->fit(Fit::Contain, $w, $h);

        $canvas->insert($foreground, AlignPosition::Center);

        $watermarkPath = base_path('resources/images/watermark.png');

        if (file_exists($watermarkPath)) {
            $canvas->watermark(
                $watermarkPath,
                paddingX: 3,
                paddingY: 3,
                paddingUnit: Unit::Percent,
                width: 80,
                height: 80
            );
        }

        $canvas->save($destPath);
    }
}
