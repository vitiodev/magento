<?php

namespace Overdose\Testimonials\Api;

interface FeedbackRepositoryInterface
{
    public function save($data);

    public function getCollection();
}
