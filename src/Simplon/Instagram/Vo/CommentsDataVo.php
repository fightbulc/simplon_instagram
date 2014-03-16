<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Helper\VoDataHelper;

    class CommentsDataVo
    {
        protected $_count;
        protected $_commentData;
        protected $_commentVoMany;

        // ######################################

        /**
         * @param array $data
         *
         * @return CommentsDataVo
         */
        public function setData(array $data)
        {
            (new VoDataHelper())
                ->setField('count', function ($val) { $this->setCount($val); })
                ->setField('data', function ($val) { $this->setCommentData($val); })
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
         * @return CommentsDataVo
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
        public function getCommentData()
        {
            return (array)$this->_commentData;
        }

        // ######################################

        /**
         * @param array $data
         *
         * @return CommentsDataVo
         */
        public function setCommentData(array $data)
        {
            $this->_commentData = $data;

            return $this;
        }

        // ######################################

        /**
         * @return CommentVo[]
         */
        public function getComments()
        {
            if (!$this->_commentVoMany)
            {
                $this->_commentVoMany = [];

                foreach ($this->getCommentData() as $data)
                {
                    $this->_commentVoMany[] = (new CommentVo())->setData($data);
                }
            }

            return $this->_commentVoMany;
        }
    } 