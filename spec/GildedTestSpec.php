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
/*The Normal Items*/
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


/*The Aged Brie Item*/
    function it_Brie_before_sell_date()
    {
        $this->beConstructedThroughOf('Aged Brie',10,5);
        $this->tick();
        $this->quality->shouldBe(11);
        $this->sellIn->shouldBe(4);
    }
    function it_Brie_before_sell_date_and_maximum_quality()
    {
        $this->beConstructedThroughOf('Aged Brie',50,5);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(4);
    }
    function it_Brie_on_the_date_casi_maxinum_quality() {
        $this->beConstructedThroughOf('Aged Brie', 49,0);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(-1);
    }
    function it_Brie_on_sell_date_and_maximum_quality() {
        $this->beConstructedThroughOf('Aged Brie', 50,0);
        $this->tick();
        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(-1);
    }

/*The Sulfuras Item*/
    function it_Sulfuras_before_sell_date()
{
    $this->beConstructedThroughOf('Sulfuras, Hand of Ragnaros',12,8);
    $this->tick();
    $this->quality->shouldBe(12);
    $this->sellIn->shouldBe(8);
}
    function it_Sulfuras_on_sell_date()
{
    $this->beConstructedThroughOf('Sulfuras, Hand of Ragnaros',12,0);
    $this->tick();
    $this->quality->shouldBe(12);
    $this->sellIn->shouldBe(0);
}
    function it_Sulfuras_after_sell_date() {
    $this->beConstructedThroughOf('Sulfuras, Hand of Ragnaros',12,-1);
    $this->tick();
    $this->quality->shouldBe(12);
    $this->sellIn->shouldBe(-1);
}

/*THe BackStage Passes Item*/

    function it_Backstage_pass_before_sell_date_1()
    {
        $this->beConstructedThroughOf('Backstage passes to a TAFKAL80ETC concert',10,11);
        $this->tick();
        $this->quality->shouldBe(11);
        $this->sellIn->shouldBe(10);
    }
    function it_Backstage_pass_before_sell_date_2()
    {
        $this->beConstructedThroughOf('Backstage passes to a TAFKAL80ETC concert',10,10);
        $this->tick();
        $this->quality->shouldBe(12);
        $this->sellIn->shouldBe(9);
    }


    function it_Backstage_pass_one_day_to_sell()
    {
        $this->beConstructedThroughOf('Backstage passes to a TAFKAL80ETC concert',10,1);
        $this->tick();
        $this->quality->shouldBe(13);
        $this->sellIn->shouldBe(0);
    }
    /**
     * Check it updates Backstage pass items on the sell date
     */
    function it_Backstage_pass_on_sell_date()
    {
        $this->beConstructedThroughOf('Backstage passes to a TAFKAL80ETC concert',50,0);
        $this->tick();
        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-1);
    }
    /**
     * Check it updates Backstage pass items after the sell date
     */
    function it_Backstage_pass_after_sell_date() {
        $this->beConstructedThroughOf('Backstage passes to a TAFKAL80ETC concert',10,-1);
        $this->tick();
        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-2);
    }
/*The Conjured Items*/

    function it_Conjured_items_before_sell_date()
    {
        $this->beConstructedThroughOf('Conjured laravel',7,7);
        $this->tick();
        $this->quality->shouldBe(6);
        $this->sellIn->shouldBe(6);
    }
    function it_Conjured_items_at_zero_quality()
    {
        $this->beConstructedThroughOf('Conjured laravel',0,6);
        $this->tick();
        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(5);
    }
    function it_Conjured_items_on_sell_date()
    {
        $this->beConstructedThroughOf('Conjured laravel',10,0);
        $this->tick();
        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(-1);
    }

    function it_Conjured_items_after_sell_date() {
        $this->beConstructedThroughOf('Conjured laravel',10,-1);
        $this->tick();
        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(-2);
    }



}
