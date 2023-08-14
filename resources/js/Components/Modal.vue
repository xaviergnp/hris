<template>
    <div
        class="modal fade"
        :id="props.modal_id"
        tabindex="-1"
        :aria-labelledby="props.modal_id + 'Label'"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <slot name="header" />
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <slot name="body" />
                </div>
            </div>
            <!-- <div class="modal-footer">
                <slot name="footer" />
            </div> -->
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    modal_id: String
})
</script>
