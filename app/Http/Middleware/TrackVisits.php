<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visit;

class TrackVisits
{
    public function handle($request, Closure $next)
    {
        $ipAddress = $request->ip();
        $pageUrl = $request->path();

        if (!$this->isVisitRecorded($ipAddress, $pageUrl)) {
            Visit::create([
                'ip_address' => $ipAddress,
                'page_url' => $pageUrl,
            ]);
        }

        return $next($request);
    }

    private function isVisitRecorded($ipAddress, $pageUrl)
    {
        return Visit::where('ip_address', $ipAddress)->where('page_url', $pageUrl)->exists();
    }
}
