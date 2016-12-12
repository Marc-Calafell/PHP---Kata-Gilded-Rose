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

/*THe BackStage Passes Item*/

/*The Conjured Items*/

/**/


}
