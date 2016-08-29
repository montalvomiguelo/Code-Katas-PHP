<?php

require '../vendor/simpletest/simpletest/autorun.php';
require '../vendor/autoload.php';

use Acme\GildedRose;

class GildedRoseTest extends UnitTestCase {

    function testUpdatesNormalItemsBeforeSellDate() {
        $item = GildedRose::of('normal', 10, 5); // quality, sell in X days
        $item->tick();
        $this->assertEqual($item->quality, 9);
        $this->assertEqual($item->sellIn, 4);
    }

    function testUpdatesNormalItemsOnTheSelldate() {
        $item = GildedRose::of('normal', 10, 0);
        $item->tick();
        $this->assertEqual($item->quality, 8);
        $this->assertEqual($item->sellIn, -1);
    }

    function testUpdatesNormalItemsAfterTheSellDate() {
        $item = GildedRose::of('normal', 10, -5);
        $item->tick();
        $this->assertEqual($item->quality, 8);
        $this->assertEqual($item->sellIn, -6);
    }

    function testUpdatesNormalItemsWithAQualityOf0() {
        $item = GildedRose::of('normal', 0, 5);
        $item->tick();
        $this->assertEqual($item->quality, 0);
        $this->assertEqual($item->sellIn, 4);
    }

    function testUpdatesBrieItemsBeforeTheSellDate() {
        $item = GildedRose::of('Aged Brie', 10, 5);
        $item->tick();
        $this->assertEqual($item->quality, 11);
        $this->assertEqual($item->sellIn, 4);
    }

    function testUpdatesBrieItemsBeforeTheSellDateWithMaximumQuality() {
        $item = GildedRose::of('Aged Brie', 50, 5);
        $item->tick();
        $this->assertEqual($item->quality, 50);
        $this->assertEqual($item->sellIn, 4);
    }

    function testUpdatesBrieItemsOntheSellDate() {
        $item = GildedRose::of('Aged Brie', 10, 0);
        $item->tick();
        $this->assertEqual($item->quality, 12);
        $this->assertEqual($item->sellIn, -1);
    }

    function testUpdatesBrieItemsOnTheSellDateNearMaximumQuality() {
        $item = GildedRose::of('Aged Brie', 49, 0);
        $item->tick();
        $this->assertEqual($item->quality, 50);
        $this->assertEqual($item->sellIn, -1);
    }

    function testUpdatesBrieItemsOnTheSellDateWithMaximumQuality() {
        $item = GildedRose::of('Aged Brie', 50, 0);
        $item->tick();
        $this->assertEqual($item->quality, 50);
        $this->assertEqual($item->sellIn, -1);
    }

    function testUpdatesBrieItemsAfterTheSellDate() {
        $item = GildedRose::of('Aged Brie', 10, -10);
        $item->tick();
        $this->assertEqual($item->quality, 12);
        $this->assertEqual($item->sellIn, -11);
    }

    function testUpdatesBriemItemsAfterTheSellDateWithMaximumQuality() {
        $item = GildedRose::of('Aged Brie', 50, -10);
        $item->tick();
        $this->assertEqual($item->quality, 50);
        $this->assertEqual($item->sellIn, -11);
    }

    function testUpdatesSulfurasItemsBeforeTheSellDate() {
        $item = GildedRose::of('Sulfuras, Hand of Ragnaros', 10, 5);
        $item->tick();
        $this->assertEqual($item->quality, 10);
        $this->assertEqual($item->sellIn, 5);
    }

    function testUpdatesSulfurasItemsOnTheSellDate() {
        $item = GildedRose::of('Sulfuras, Hand of Ragnaros', 10, 5);
        $item->tick();
        $this->assertEqual($item->quality, 10);
        $this->assertEqual($item->sellIn, 5);
    }

    function testUpdatesSulfurasItemsAfterTheSellDate() {
        $item = GildedRose::of('Sulfuras, Hand of Ragnaros', 10, -1);
        $item->tick();
        $this->assertEqual($item->quality, 10);
        $this->assertEqual($item->sellIn, -1);
    }

    function testUpdatesBackstagePassItemsLongBeforeTheSellDate() {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 11);
        $item->tick();
        $this->assertEqual($item->quality, 11);
        $this->assertEqual($item->sellIn, 10);
    }

    function testUpdatesBackstagePassItemsCloseToTheSellDate() {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 10);
        $item->tick();
        $this->assertEqual($item->quality, 12);
        $this->assertEqual($item->sellIn, 9);
    }

    function testUpdatesBackstagePassItemsCloseTheSellDataAtMaxQuality() {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 50, 10);
        $item->tick();
        $this->assertEqual($item->quality, 50);
        $this->assertEqual($item->sellIn, 9);
    }

    function testUpdatesBackstagePassItemsVeryCloseToTheSellDate() {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 5);
        $item->tick();
        $this->assertEqual($item->quality, 13);
        $this->assertEqual($item->sellIn, 4);
    }

    function testUpdatesBackstagePassItemsVeryCloseToTheSellDateAtMaxQuality() {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 50, 5);
        $item->tick();
        $this->assertEqual($item->quality, 50);
        $this->assertEqual($item->sellIn, 4);
    }

    function testUpdatesBackstagePassItemsWithOneDayLeftToSell() {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 1);
        $item->tick();
        $this->assertEqual($item->quality, 13);
        $this->assertEqual($item->sellIn, 0);
    }

    function testUpdatesBackstagePassItemsWithOneDayLeftToSellAtMaxQuality() {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 50, 1);
        $item->tick();
        $this->assertEqual($item->quality, 50);
        $this->assertEqual($item->sellIn, 0);
    }

    function testUpdatesBackstagePassItemsOnTheSellDate() {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 0);
        $item->tick();
        $this->assertEqual($item->quality, 0);
        $this->assertEqual($item->sellIn, -1);
    }

    function testUpdatesBackstagePassItemsAfterTheSellDate() {
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, -1);
        $item->tick();
        $this->assertEqual($item->quality, 0);
        $this->assertEqual($item->sellIn, -2);
    }

    function testUpdatesConjuredItemsBeforeTheSellDate() {
        $item = GildedRose::of('Conjured Mana Cake', 10, 10);
        $item->tick();
        $this->assertEqual($item->quality, 8);
        $this->assertEqual($item->sellIn, 9);
    }

    function testUpdatesConjuredItemsAtZeroQuality() {
        $item = GildedRose::of('Conjured Mana Cake', 0, 10);
        $item->tick();
        $this->assertEqual($item->quality, 0);
        $this->assertEqual($item->sellIn, 9);
    }

    function testUpdatesConjuredItemsOnTheSellDate() {
        $item = GildedRose::of('Conjured Mana Cake', 10, 0);
        $item->tick();
        $this->assertEqual($item->quality, 6);
        $this->assertEqual($item->sellIn, -1);
    }

    function updatesConjuredItemsOnTheSellDateAt0Quality() {
        $item = GildedRose::of('Conjured Mana Cake', 0, 0);
        $item->tick();
        $this->assertEqual($item->quality, 0);
        $this->assertEqual($item->sellIn, -1);
    }

    function testUpdatesConjuredItemsAfterTheSellDate() {
        $item = GildedRose::of('Conjured Mana Cake', 10, -10);
        $item->tick();
        $this->assertEqual($item->quality, 6);
        $this->assertEqual($item->sellIn, -11);
    }

    function testUpdatesConjuredItemsAfterTheSellDateAtZeroQuality() {
        $item = GildedRose::of('Conjured Mana Cake', 0, -10);
        $item->tick();
        $this->assertEqual($item->quality, 0);
        $this->assertEqual($item->sellIn, -11);
    }

}
