<?php

    namespace Simplon\Instagram\Core;

    class InstagramRequests
    {
        /**
         * @param array $params
         *
         * @return string
         */
        protected static function _buildGetParams(array $params)
        {
            $new = [];

            foreach ($params as $k => $v)
            {
                $new[] = $k . '=' . $v;
            }

            return join('&', $new);
        }

        // ######################################

        /**
         * @param $pathResource
         * @param array $paramsGet
         *
         * @return string
         */
        protected static function _buildUrl($pathResource, array $paramsGet = [])
        {
            $url = trim(InstagramConstants::URL_API_ROOT, '/') . '/' . trim($pathResource, '/');

            if (!empty($paramsGet))
            {
                $url = $url . '?' . self::_buildGetParams($paramsGet);
            }

            return $url;
        }

        // ##########################################

        /**
         * @param array $params
         *
         * @return string
         */
        public static function getAuthUrl(array $params)
        {
            return self::_buildUrl(InstagramConstants::ENDPOINT_OAUTH_AUTHORIZE, $params);
        }

        // ##########################################

        /**
         * @param $pathResource
         * @param array $params
         *
         * @return array
         * @throws InstagramException
         */
        public static function get($pathResource, array $params)
        {
            if (!$pathResource)
            {
                throw new InstagramException(
                    InstagramConstants::ERR_MISSING_ENDPOINT_CODE,
                    InstagramConstants::ERR_MISSING_ENDPOINT_MESSAGE
                );
            }

            // ----------------------------------

            $url = self::_buildUrl($pathResource, $params);

            $curl = \CURL::init($url)
                ->setReturnTransfer(TRUE);

            return self::_request($curl);
        }

        // ##########################################

        /**
         * @param $pathResource
         * @param array $params
         *
         * @return array
         * @throws InstagramException
         */
        public static function post($pathResource, array $params)
        {
            if (!$pathResource)
            {
                throw new InstagramException(
                    InstagramConstants::ERR_MISSING_ENDPOINT_CODE,
                    InstagramConstants::ERR_MISSING_ENDPOINT_MESSAGE
                );
            }

            // ----------------------------------

            $url = self::_buildUrl($pathResource);

            $curl = \CURL::init($url)
                ->setPost(TRUE)
                ->setPostFields($params)
                ->setReturnTransfer(TRUE);

            return self::_request($curl);
        }

        // ##########################################

        /**
         * @param $pathResource
         * @param array $params
         *
         * @return array
         * @throws InstagramException
         */
        public static function delete($pathResource, array $params)
        {
            if (!$pathResource)
            {
                throw new InstagramException(
                    InstagramConstants::ERR_MISSING_ENDPOINT_CODE,
                    InstagramConstants::ERR_MISSING_ENDPOINT_MESSAGE
                );
            }

            // ----------------------------------

            $url = self::_buildUrl($pathResource, $params);

            $curl = \CURL::init($url)
                ->setCustomRequest('DELETE')
                ->setReturnTransfer(TRUE);

            return self::_request($curl);
        }

        // ######################################

        /**
         * @param \CURL $curl
         *
         * @return array
         * @throws InstagramException
         */
        protected function _request(\CURL $curl)
        {
            $response = self::_parseResponse($curl->execute());

            if (isset($response['error_message']) || isset($response['meta']['error_message']))
            {
                $error = isset($response['error_message']) ? $response : $response['meta'];

                throw new InstagramException(
                    $error['code'],
                    $error['error_message'],
                    $error
                );
            }

            // ----------------------------------

            return isset($response['meta']) ? $response['data'] : $response;
        }

        // ######################################

        /**
         * @param $response
         *
         * @return array
         */
        protected static function _parseResponse($response)
        {
            return (array)json_decode($response, TRUE);
        }
    } 