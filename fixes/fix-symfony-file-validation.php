<?php

namespace Symfony\Component\HttpFoundation\File {

    /**
     * ***************************************************************************
     * ******* WARNING **** WARNING **** WARNING **** WARNING **** WARNING *******.
     * ***************************************************************************
     * *******                                                             *******
     * *******        THIS FUNCTION OVERLOADING IS NECESSARY MEASURE       *******
     * *******   https://github.com/avto-dev/roadrunner-laravel/issues/10  *******
     * *******        https://github.com/spiral/roadrunner/issues/133      *******
     * *******                                                             *******
     * ***************************************************************************.
     *
     * Tells whether the file was uploaded via HTTP POST.
     *
     * @link  https://php.net/manual/en/function.is-uploaded-file.php
     *
     * @param string $filename The filename being checked
     *
     * @return bool always true
     *
     * @see   \Symfony\Component\HttpFoundation\File\UploadedFile::isValid
     *
     * @since 4.0.3
     * @since 5.0
     * @since 7.0
     * @since 8.0
     */
    function is_uploaded_file(string $filename): bool
    {
        return true;
    }
}
