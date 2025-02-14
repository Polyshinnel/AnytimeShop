<?php

namespace App\Service\Faq;

use App\Models\Faq;
use App\Models\FaqGroups;

class FaqService
{
    public function getFaqs(): array
    {
        $faqs = [];
        $faqGroups = FaqGroups::all();
        if(!$faqGroups->isEmpty())
        {
            foreach($faqGroups as $faqGroup)
            {
                $faq = Faq::where('faq_group_id', $faqGroup->id)->get();
                if(!$faq->isEmpty())
                {
                    $faqs[] = [
                        'group_name' => $faqGroup->name,
                        'faq_list' => $faq,
                    ];
                }
            }
        }
        return $faqs;
    }
}
