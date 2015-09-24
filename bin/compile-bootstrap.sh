#!/usr/bin/env bash

#
# This script generates the scoped Twitter Bootstrap CSS files.
#
# It requires less and the clean-css plugin (for a minified build):
#
#     npm install -g less
#     npm install -g less-plugin-clean-css
#

BIN_DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )

lessc --clean-css $BIN_DIR/../Resources/less/scoped-bootstrap.less $BIN_DIR/../Resources/public/css/scoped-bootstrap.min.css
