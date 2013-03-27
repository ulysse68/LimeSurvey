<?php 
    class PublicList extends LSYii_Action
    {
        public function run()
        {

            $surveys = Survey::model()->findAllByAttributes(array(
           //     'active' => 'Y',
                'listpublic' => 'Y'
            ));
            $this->getController()->layout = false;
            $this->getController()->render('publiclist', compact('surveys'));
        }
    }
?>