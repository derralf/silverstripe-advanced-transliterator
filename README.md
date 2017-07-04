Advanced transliteration for SilverStripe
=======================

Adds support for cyrillic transliteration for SilverStripe.

Uses Passport (2013) system, ICAO, for cyrillic ([http://en.wikipedia.org/wiki/Romanization_of_Russian#Transliteration_table]())

Additionally uses Transliterator::transliterate if available to romanize other non-ascii  characters like e.g. chinese ([http://us2.php.net/manual/de/transliterator.transliterate.php]())

## Requirements

SilverStripe 3

## Documentation

Simply install the module using the standard method.

Transliteration for URL segments, file names, etc will automatically be supported.

## Credits

Cyrillic table (Passport 2013) taken from [unisolutions/silverstripe-cyrillic-transliterator](https://github.com/unisolutions/silverstripe-cyrillic-transliterator)