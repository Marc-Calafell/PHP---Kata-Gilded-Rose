<?php

namespace spec\App;

use App\GildedTest;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class GildedTestSpec
 * @package spec\App
 */
class GildedTestSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->beConstructedWith('of',['normal',10,5],1);
        $this->shouldHaveType(GildedTest::class);
    }

    function it_normal_items_before_sell_date()
    {
        $this->beConstructedThroughOf('normal',10,5);

        $this->tick();

        $this->quality->shouldBe(9);
        $this->sellIn->shouldBe(4);
    }

    function it_normal_items_on_sell_date() {
        $this->beConstructedThroughOf('normal',10,0);

        $this->tick();

        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(-1);
    }

    function it_normal_items_after_sell_date() {
        $this->beConstructedThroughOf('normal',10,-5);

        $this->tick();

        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(-6);
    }

    function it_normal_items_quality_0() {
        $this->beConstructedThroughOf('normal',0,5);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(4);
    }

}
