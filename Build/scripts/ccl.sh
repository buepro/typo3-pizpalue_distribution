#!/usr/bin/env bash

#=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
#
# Creates changelog file for a release
# ====================================
#
# Usage
# -----
#
# 1. Change to project directory (typo3conf/ext/pizpalue_distribution)
# 2. Run: ./Build/scripts/ccl.sh fromVersion targetVersion
#
# For escaping sequences see as well https://i.stack.imgur.com/NfH6K.png
#
#=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*

#
# Usage: write_commit startCommit endCommit selector
#
function write_commits {
  git log "$1".."$2" --pretty="* %s (%cd, %h by %an)" --date=format:%d.%m.%Y --abbrev-commit
}

target=./Documentation/Changelog/Index.rst

echo ".. include:: /Includes.rst.txt

.. _changelog:

=========
Changelog
=========

The project changes can as well be looked up at \`Github <https://github.com/
buepro/typo3-pizpalue_distribution/commits/main>\`__.

$(write_commits "$1" "$2")

Reference
=========

* Generated by: :bash:\`git log $1..$2 --pretty=\"* %s (%cd, %h by %an)\" --date=format:%d.%m.%Y --abbrev-commit\`

" > "$target"


