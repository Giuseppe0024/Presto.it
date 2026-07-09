<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\AnnotateImageRequest;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\Image as VisionImage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class GoogleVisionSafeSeearch implements ShouldQueue
{
    use Queueable;

    private $article_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->article_image_id);

        if (! $i) {
            return;
        }
        // findOrFail() metodo che fa la stessa cosa di righe 36-40

        $image = file_get_contents(storage_path('app/public/'.$i->path));
        putenv('GOOGLE_APPLICATION_CREDENTIALS='.base_path('google_credential.json'));

        $googleVisionClient = new ImageAnnotatorClient;
        $google_image = new VisionImage([
            'content' => $image,
        ]);

        $googleFeature = new Feature;
        $googleFeature->setType(Type::SAFE_SEARCH_DETECTION);

        $request = new AnnotateImageRequest;
        $request->setImage($google_image);
        $request->setFeature([$googleFeature]);

        $batchRequest = new BatchAnnotateImageRequest;
        $batchRequest->setRequests([$request]);

        $responseBatch = $googleVisionClient->batchAnnotateImages($batchRequest);

        $response = $responseBatch->getResponses();
        $googleVisionClient->close();

        $safeSearchAnnotation = $response[0]->getSafeSearchAnnotation();
        $adult = $safeSearchAnnotation->getAdult();
        $spoof = $safeSearchAnnotation->getSpoof();
        $medical = $safeSearchAnnotation->getMedical();
        $violence = $safeSearchAnnotation->getViolence();
        $racy = $safeSearchAnnotation->getRacy();

        $likeliHoodName = [
            'text-bg-tertiary fa-solid fa-circle',
            'text-secondary fa-solid fa-circle-check',
            'text-secondary fa-solid fa-circle-check',
            'text-warning fa-solid fa-circle-exclamation',
            'text-warning fa-solid fa-circle-exclamation',
            'text-danger fa-solid fa-circle-minus',

        ];

        $i->adult = $likeliHoodName[$adult];
        $i->spoof = $likeliHoodName[$spoof];
        $i->medical = $likeliHoodName[$medical];
        $i->violence = $likeliHoodName[$violence];
        $i->racy = $likeliHoodName[$racy];

        $i->save();

    }
}
