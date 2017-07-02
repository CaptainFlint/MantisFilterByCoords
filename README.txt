FilterByCoords
==============

Mantis plugin for Euro/American Truck Simulator related projects.
The plugin allows to filter bugs by in-game map coordinates.

Author: Konstantin Vlasov aka CaptainFlint (support@flint-inc.ru), 2016
https://github.com/CaptainFlint/MantisFilterByCoords

Based on the FilterBugList plugin:
https://github.com/mantisbt-plugins/FilterBugList
by Alain D'EURVEILHER (alain.deurveilher@gmail.com)

+------------------------------------------------------------------------------+

The plugin adds two new fields to the list of filters: "Coordinates" and
"Distance". After applying filter, only those bugs will be displayed which:
a) have one or more set of coordinates in the Description field;
b) at least one of those sets of coordinates is not farther than the specified
   distance from at least one of the points specified in the Coordinates field
   (the vertical component is ignored).

The Distance is an integer value, amount of the in-game units. The Coordinates
field should contain one or more sets of coordinates in the format:

(sec+0011-0008);45310.2;51.5865;-30096.5

Sets should be separated from each other by spaces or newlines. This field may
also contain other text, it will be simply ignored (it allows to copy-paste bug
report messages from bugs.txt as is).

+------------------------------------------------------------------------------+
Version 2.0.0
* Converted to work with Mantis 2.x (tested on 2.5.1):
** fixed plugin requirements;
** fixed non-working distance field;
** reorganized Configuration page according to the new design.
* Fixed: When there was no matches, full list of bugs was displayed instead of
  empty list.
* If no valid coordinates are provided the bugs list will not be filtered.

Version 1.0.1
* Added plugin option to customize the default maximum distance.
* Added filter field to specify the maximum distance.

Version 1.0.0
* First working version.
* Hardcoded maximum distance from specified coordinates to 300 in-game units.
