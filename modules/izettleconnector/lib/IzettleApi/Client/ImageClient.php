<?php
/**
 * 2020 Zettle Prestashop Connector
 *  @author    : Zettle
 *  @copyright : 2020 Zettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : zettle.com
 *
 */

namespace IzettleApi\Client;

use IzettleApi\API\Image;
use IzettleApi\Client\Image\ImageUploadRequestInterface;
use IzettleApi\Client\Image\ImageUrlUpload;
use IzettleApi\IzettleClientInterface;
use IzettleApi\Client\Image\ImageBulkUrlUpload;


final class ImageClient
{
    const BASE_URL = 'https://image.izettle.com/v2/images/organizations/%s';
    const POST_IMAGE = self::BASE_URL . '/products';
    const POST_IMAGE_BULK = self::POST_IMAGE . '/bulk';

    private $client;
    private $organizationUuid = 'self';
    private $imageBuilder;

    public function __construct(
        IzettleClientInterface $client,
        $organizationUuid = null,
        $imageBuilder
    ) {
        $this->client = $client;
        $this->organizationUuid = (string) $organizationUuid;
        $this->imageBuilder = $imageBuilder;
    }

    public function postImage($imageUploadRequest)//: Image
    {
        $url = sprintf(self::POST_IMAGE, $this->organizationUuid);
        $response = $this->client->post($url, $imageUploadRequest);

        return $this->imageBuilder->buildFromJson($this->client->getJson($response));
    }

    public function bulkUploadImage($imageUploadRequestList)//: Image
    {
        $url = sprintf(self::POST_IMAGE_BULK, $this->organizationUuid);
        $response = $this->client->post($url, ImageBulkUrlUpload::create($imageUploadRequestList));

        return json_decode($this->client->getJson($response), true);
    }
}
