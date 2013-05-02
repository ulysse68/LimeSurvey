<?php 
    class PublicList extends LSYii_Action
    {
        public function run()
        {
            App()->getClientScript()->registerPackage('jquery');

            $surveys = Survey::model()->with(
              array(
                'languagesettings' => array(
                    'condition' => "languagesettings.surveyls_language = '" . substr(App()->language, 0, 2) . "'"
                )
              )
               
            )->findAllByAttributes(array(
           //     'active' => 'Y',
                'listpublic' => 'Y',
            ));
            $this->getController()->layout = false;
            $this->getController()->render('publiclist_twig', compact('surveys'));
        }
    }
?>