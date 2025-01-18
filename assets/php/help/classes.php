<?php
class FAQ
{
    public $question;
    public $answer;


    public function __construct($question, $answer)
    {
        $this->question = $question;
        $this->answer = $answer;
    }

    public function FAQcontent()
    {
        return
            '
        <div class="faqs m-3 wow animate__animated animate__fadeInUp" data-wow-duration="5s">
                <div class="row d-flex justify-content-start">
                    <button class="btnExpand btn p-0 border-0 d-flex justify-content-start"
                        onclick="expandContent(this)">
                        <img src="assets/images/helpCenter/plus.png" alt="Expand Button" class="expandbtn-img">

                        <div class="text ps-2 pb-1 d-flex align-items-center ">
                            <p>'.$this->question.'</p>
                        </div>
                    </button>
                    <div class="information" id="information" style="display: none">
                        '.$this->answer.'
                    </div>
                </div>
        </div>
        ';

    }
}
?>