<?php
class FAQ
{
    public $category;
    public $question;
    public $answer;

    public function __construct($category, $question, $answer)
    {
        $this->category = $category;
        $this->question = $question;
        $this->answer = $answer;
    }
    // Group FAQs by category
    public static function groupByCategory($faqRows)
    {
        $faqsByCategory = [];
        foreach ($faqRows as $row) {
            $category = $row["category"];
            $faq = new FAQ($row["category"], $row["question"], $row["answer"]);

            // Make a new category group if it doesn't already exist
            if (!isset($faqsByCategory[$category])) {
                $faqsByCategory[$category] = [];
            }
            $faqsByCategory[$category][] = $faq; // Add FAQ to its category
        }
        return $faqsByCategory;
    }

        // Display one FAQ question with expandable details
    public function renderQuestion()
    {
        return "
            <button class='btnExpand btn p-0 border-0 d-flex justify-content-start' onclick='expandContent(this)'>
                <div class='text ps-2 pb-1 d-flex align-items-center'>
                    <p>$this->question</p>
                </div>
            </button>
            <div class='information ps-5' style='display: none;'>
                $this->answer
            </div>
        ";
    }

    // Show FAQs organized by category
    public static function renderCategory($category, $faqs)
    {
        $faqContent = "";
        foreach ($faqs as $faq) {
            $faqContent .= $faq->renderQuestion(); // Display each FAQ question within the category
        }
        return "
        <div class='row d-flex justify-content-start'>
        <button class='btnExpand btn p-0 border-0 d-flex justify-content-start' onclick='expandContent(this)'>
            <i style='margin-top: 3px;' class='fa fa-plus expandbtn-icon' aria-hidden='true'></i>
            
            <div class='text ps-2 pb-1 d-flex align-items-center'>
                <p>{$category}</p>
            </div>
        </button>
        <div class='information ps-4' style='display: none;'>
            {$faqContent}
        </div>
    </div>
        ";
    }
}
