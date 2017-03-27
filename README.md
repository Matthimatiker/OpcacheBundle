# OpcacheBundle #

[![Build Status](https://travis-ci.org/Matthimatiker/OpcacheBundle.svg?branch=master)](https://travis-ci.org/Matthimatiker/OpcacheBundle)
[![Coverage Status](https://coveralls.io/repos/Matthimatiker/OpcacheBundle/badge.svg?branch=master&service=github)](https://coveralls.io/github/Matthimatiker/OpcacheBundle?branch=master)


## Installation ##

Install the bundle via [Composer](https://getcomposer.org):

    php composer.phar require --dev matthimatiker/opcache-bundle

Enable the bundle in your kernel:

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        / ...
        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            // ...
            $bundles[] = new Matthimatiker\OpcacheBundle\MatthimatikerOpcacheBundle();
        }
    }


## Usage ##

After bundle activation, an additional info box shows up in the profiler toolbar.
It provides quick access to the current memory usage and hit rate of the Opcache.

The detail page provides comprehensive information about memory state, cache key usage and cached scripts:

![Profiler page example](Resources/docs/profiler-opcache-example.png)

