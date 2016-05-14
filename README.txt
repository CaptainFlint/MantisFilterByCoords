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

The plugin adds a new field "Coordinates" to the list of filters. In this field
one can enter one or more sets of coordinates in the format:

(sec+0011-0008);45310.2;51.5865;-30096.5

Sets should be separated from each other by spaces or newlines. Input field may
also contain other text, it will be simply ignored (it allows to copy-paste bug
report messages from bugs.txt as is).

The plugin then makes sure that the resultant list displays only bugs which:
a) have one or more set of coordinates in the Description or Additional
   Information;
b) at least one of the sets of coordinates is close enough (<= 300 units) to at
   least one of the points specified in the filter field (the vertical component
   is ignored).

TODO:
* Add option to customize inclusion distance.
