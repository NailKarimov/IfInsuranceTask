<?php

namespace PageObject;

/**
 * Class IfLvPage
 * @package Selector\Front
 */
class IfLvVacancies
{
    const PAGE_LOGO = '//*[@id="main-navigation"]/li[1]/a';
    const QA_SECTION = '//span[contains(text(), "Quality Assurance Specialist")]';
    const QA_READ_MORE = '//span[contains(text(), "Quality Assurance Specialist")]/../self::li[1]/a';
}