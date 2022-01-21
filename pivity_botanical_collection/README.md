# Privit Botanical Collection - PBC

## Project Structure

### [scr/ConstantsData/Constants.php](https://github.com/BarbaraCristinaNunes/final-project/blob/main/pivity_botanical_collection/src/ConstantsData/Constants.php)

I created six (6) arrays where I keep information about phylum, class, order, family, genus and scientific name. Information from array called $genus are from [GBIF](https://www.gbif.org/species/2519) and [The Plant List](http://www.theplantlist.org/browse/A/Cactaceae/) and information from array called $scientificName are from [GBIF](https://www.gbif.org/species/2519).

## <b>Notes</b>

* 21/01/2022

When I created Constants.php it was not a class. So I was having problem to run the project and to install Doctrine.

    Symfony was returning the following error:
    Symfony\Component\ErrorHandler\DebugClassLoader::checkClass(): Argument #1 ($class) must be of type string, array given, called in C:\******\******\*****\******\******\final-project\pivity_botanical_collection\vendor\symfony\error-handler\DebugClassLoader.php on line 298

To resolve this I trasnformed Constants.php in a class and my arrays in public variables.