FilterByCoords
==============

Mantis plugin for Euro/American Truck Simulator related projects.
The plugin allows to filter bugs by in-game map coordinates.

Author: Konstantin Vlasov aka CaptainFlint (support@flint-inc.ru), 2017
https://github.com/CaptainFlint/MantisFilterByCoords

Based on the FilterBugList plugin:
https://github.com/mantisbt-plugins/FilterBugList
by Alain D'EURVEILHER (alain.deurveilher@gmail.com)

+------------------------------------------------------------------------------+

The plugin adds three new fields to the list of filters.


1. Coordinates
This field accepts one or more sets of coordinates in the format:

(sec+0002+0007);11053;58.453;28993.7;-2.21167;-0.137324

The last two coordinates are optional, so both the old 3-coordinates and the new
5-coordinates formats are supported. Sets should be separated from each other by
spaces or newlines. This field may also contain other text, it will be simply
ignored (it allows to copy-paste bug report messages from bugs.txt as is).
After applying the filter, only those bugs will be displayed which:
a) have one or more set of coordinates in their Description field;
b) at least one of those sets of coordinates is not farther than the specified
   distance (see field Distance below) from at least one of the points listed in
   the Coordinates field (the vertical component is ignored).


2. Distance
Here you can set the maximum distance for the coordinates filter. By default
it is 300 units which gives reasonable margin for possible coverage of the same
spot by different reporters.


3. Sectors
This is an independent filter for searching bugs in specific sectors. You need
to enter one or more sector definitions in the following format:

+0011-0008

separated by any space or punctuation characters; leading zeroes in numbers are
optional (so you can write just "+11-8"). After applying the filter, only those
bugs will be displayed that have at least one set of coordinates at one of the
specified sectors.


+------------------------------------------------------------------------------+
Version 2.0.0
* Converted to work with Mantis 2.x (tested on 2.5.1):
** fixed plugin requirements;
** fixed non-working distance field;
** reorganized Configuration page according to the new design.
* Added filter by sectors.
* Fixed: When there was no matches, full list of bugs was displayed instead of
  empty list.
* If no valid coordinates are provided the bugs list will not be filtered.

Version 1.0.1
* Added plugin option to customize the default maximum distance.
* Added filter field to specify the maximum distance.

Version 1.0.0
* First working version.
* Hardcoded maximum distance from specified coordinates to 300 in-game units.
