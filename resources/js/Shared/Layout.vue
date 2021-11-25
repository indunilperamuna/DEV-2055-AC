<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <Link class="navbar-brand" href="/">InertiaJS App</Link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <Link class="nav-link active" aria-current="page" href="/providers">Providers</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        <article>
            <slot />
        </article>
    </main>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
    inject: ['page'],
    components: {
        Link,
    }
}
</script>
