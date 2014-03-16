<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Helper\VoDataHelper;

    class LocationVo
    {
        protected $_id;
        protected $_name;
        protected $_lat;
        protected $_lng;

        // ######################################

        /**
         * @param array $data
         *
         * @return LocationVo
         */
        public function setData(array $data)
        {
            (new VoDataHelper())
                ->setField('id', function ($val) { $this->setId($val); })
                ->setField('name', function ($val) { $this->setName($val); })
                ->setField('latitude', function ($val) { $this->setLat($val); })
                ->setField('longitude', function ($val) { $this->setLng($val); })
                ->applyOn($data);

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getId()
        {
            return (string)$this->_id;
        }

        // ######################################

        /**
         * @param string $id
         *
         * @return LocationVo
         */
        public function setId($id)
        {
            $this->_id = $id;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getLat()
        {
            return (float)$this->_lat;
        }

        // ######################################

        /**
         * @param float $lat
         *
         * @return LocationVo
         */
        public function setLat($lat)
        {
            $this->_lat = $lat;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getLng()
        {
            return (float)$this->_lng;
        }

        // ######################################

        /**
         * @param float $lng
         *
         * @return LocationVo
         */
        public function setLng($lng)
        {
            $this->_lng = $lng;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getName()
        {
            return (string)$this->_name;
        }

        // ######################################

        /**
         * @param string $name
         *
         * @return LocationVo
         */
        public function setName($name)
        {
            $this->_name = $name;

            return $this;
        }
    } 