<?php

/**
 * Render the given HttpException.
 *
 * @param  \Symfony\Component\HttpKernel\Exception\HttpException  $e
 * @return \Symfony\Component\HttpFoundation\Response
 */
function renderHttpException(HttpException $e)
{
    if (! view()->exists("errors.{$e->getStatusCode()}")) {
        return response()->view('errors.default', ['exception' => $e], 500, $e->getHeaders());
    }

    return parent::renderHttpException($e);
}
