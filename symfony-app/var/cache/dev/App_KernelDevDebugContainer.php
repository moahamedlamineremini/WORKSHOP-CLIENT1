<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerQzNtb7U\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerQzNtb7U/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerQzNtb7U.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerQzNtb7U\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerQzNtb7U\App_KernelDevDebugContainer([
    'container.build_hash' => 'QzNtb7U',
    'container.build_id' => 'c2e6c18c',
    'container.build_time' => 1726566135,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerQzNtb7U');