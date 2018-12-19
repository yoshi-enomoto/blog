<template>
    <div>
        <ul>
            <li>{{ post.title }}</li>
            <li>{{ post.body }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            post: {
                type: Object,
                required: true,
            }
        }
    }
</script>
