<?php

    namespace Simplon\Instagram\Tags;

    use Simplon\Instagram\Core\InstagramConstants;
    use Simplon\Instagram\Core\InstagramRequests;
    use Simplon\Instagram\Vo\FeedVo;
    use Simplon\Instagram\Vo\TagVo;

    class Tags
    {
        /**
         * @param string $accessToken
         * @param string $tagName
         *
         * @return TagVo
         */
        public function getInfo($accessToken, $tagName)
        {
            $params = [
                'access_token' => $accessToken,
            ];

            $endpoint = str_replace('{{tagName}}', $tagName, InstagramConstants::ENDPOINT_TAGS_INFO);
            $response = InstagramRequests::get($endpoint, $params);

            return (new TagVo())->setData($response);
        }

        // ######################################

        /**
         * @param string $accessToken
         * @param string $tagName
         * @param null $minId
         * @param null $maxId
         *
         * @return FeedVo
         */
        public function getMediaRecent($accessToken, $tagName, $minId = NULL, $maxId = NULL)
        {
            $params = [
                'access_token' => $accessToken,
            ];

            if ($minId !== NULL)
            {
                $params['min_id'] = $minId;
            }

            if ($maxId !== NULL)
            {
                $params['max_id'] = $maxId;
            }

            $endpoint = str_replace('{{tagName}}', $tagName, InstagramConstants::ENDPOINT_TAGS_MEDIA_RECENT);
            $response = InstagramRequests::get($endpoint, $params);

            return (new FeedVo())->setData($response);
        }

        // ######################################

        /**
         * @param string $accessToken
         * @param string $name
         *
         * @return TagVo[]
         */
        public function searchByName($accessToken, $name)
        {
            $params = [
                'access_token' => $accessToken,
                'q'            => $name,
            ];

            $response = InstagramRequests::get(InstagramConstants::ENDPOINT_TAGS_SEARCH, $params);

            $tagVoMany = [];

            foreach ($response as $tag)
            {
                $tagVoMany[] = (new TagVo())->setData($tag);
            }

            return $tagVoMany;
        }
    } 