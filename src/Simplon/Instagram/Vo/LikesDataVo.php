<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Helper\VoDataHelper;

    class LikesDataVo
    {
        protected $_count;
        protected $_likeData;
        protected $_userShortVoMany;

        // ######################################

        /**
         * @param array $data
         *
         * @return LikesDataVo
         */
        public function setData(array $data)
        {
            (new VoDataHelper())
                ->setField('count', function ($val) { $this->setCount($val); })
                ->setField('data', function ($val) { $this->setLikeData($val); })
                ->applyOn($data);

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getCount()
        {
            return (int)$this->_count;
        }

        // ######################################

        /**
         * @param int $count
         *
         * @return LikesDataVo
         */
        public function setCount($count)
        {
            $this->_count = $count;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getLikeData()
        {
            return (array)$this->_likeData;
        }

        // ######################################

        /**
         * @param array $data
         *
         * @return LikesDataVo
         */
        public function setLikeData(array $data)
        {
            $this->_likeData = $data;

            return $this;
        }

        // ######################################

        /**
         * @return UserShortVo[]
         */
        public function getUsers()
        {
            if (!$this->_userShortVoMany)
            {
                $this->_userShortVoMany = [];

                foreach ($this->getLikeData() as $data)
                {
                    $this->_userShortVoMany[] = (new UserShortVo())->setData($data);
                }
            }

            return $this->_userShortVoMany;
        }
    } 