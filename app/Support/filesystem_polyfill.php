<?php

namespace Illuminate\Filesystem;

if (! function_exists(__NAMESPACE__.'\\symlink')) {
    /**
     * Polyfill for environments where PHP symlink() is unavailable/disabled.
     */
    function symlink(string $target, string $link): bool
    {
        if (\function_exists('symlink')) {
            return @\symlink($target, $link);
        }

        // Try shell-based link creation on Unix-like hosts.
        if (\DIRECTORY_SEPARATOR === '/' && \function_exists('exec')) {
            $targetArg = \escapeshellarg($target);
            $linkArg = \escapeshellarg($link);
            @\exec("ln -s {$targetArg} {$linkArg} 2>&1", $output, $exitCode);

            if ($exitCode === 0 || @\is_link($link)) {
                return true;
            }
        }

        if (\is_dir($target)) {
            return filesystem_polyfill_copy_directory($target, $link);
        }

        if (\is_file($target)) {
            $parent = \dirname($link);

            if (! \is_dir($parent)) {
                @\mkdir($parent, 0777, true);
            }

            return @\copy($target, $link);
        }

        return false;
    }
}

if (! function_exists(__NAMESPACE__.'\\filesystem_polyfill_copy_directory')) {
    /**
     * Recursive copy fallback used when symbolic links cannot be created.
     */
    function filesystem_polyfill_copy_directory(string $source, string $destination): bool
    {
        if (! \is_dir($source)) {
            return false;
        }

        if (! \is_dir($destination) && ! @\mkdir($destination, 0777, true) && ! \is_dir($destination)) {
            return false;
        }

        $items = @\scandir($source);

        if ($items === false) {
            return false;
        }

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $from = $source.\DIRECTORY_SEPARATOR.$item;
            $to = $destination.\DIRECTORY_SEPARATOR.$item;

            if (\is_dir($from)) {
                if (! filesystem_polyfill_copy_directory($from, $to)) {
                    return false;
                }
            } elseif (! @\copy($from, $to)) {
                return false;
            }
        }

        return true;
    }
}
