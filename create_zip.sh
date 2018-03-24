#!/bin/bash
rm -rf /tmp/molecular;
mkdir /tmp/molecular;
cp -r . /tmp/molecular;
rm -rf /tmp/molecular/.git
cd /tmp/molecular
zip -r ~/Desktop/molecular.zip *;
