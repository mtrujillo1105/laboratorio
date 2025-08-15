<template>
    <div class="tags-input-container">
        <div class="tag" v-for="(tag, index) in tags" :key="'tag' + index">
            <span v-if="activeTag !== index" @click="activeTag = index">
                {{tag}}
            </span>
            <input v-else
                v-model="tags[index]"
                v-focus
                :style="{'width': tag.length + 'ch'}"
                @keyup.enter="activeTag = null"
                @blur="activeTag = null"
            />
            <span @click="removeTag(index)">
                <i class="fas fa-times-circle"></i>
            </span>
        </div>
        <input v-model="tagValue"
                v-bind:class="{ error: errorMessage !== ''}"
                @keyup.enter="addTag"
                v-on:blur="addTag"
                :placeholder="placeholder"
            />
        <span class="error" v-if="errorMessage !== ''">{{errorMessage}}
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
    </div>
</template>

<script>
export default {
    props: {
        values : {
            type: Array,
            default: () => [],
        },
        placeholder: {
            type: String,
            default: () => 'Ingrese el texto'
        },
        limit: {
            type: Number
        },
        typeValidation: {
            type: String,
            default: () => ''
        },
        duplicateValidation: {
            type: Boolean,
            default: () => false
        }
    },
    data: () => {
        return {
            tagValue: '',
            tags: [],
            activeTag: null,
            errorMessage: ''
        }
    },
    methods: {
        addTag(){
            this.errorMessage = '';
            if(!this.tagValue == '' && this.validation()){
                this.tags.push(this.tagValue);

                this.tagValue = '';
            }
        },
        removeTag(index) {
            this.tags.splice(index, 1);
        },
        validation(){
            if(this.limit !== undefined && this.limit < this.tags.length + 1){
                this.errorMessage = 'Cantidad maxima de items permitidos.';
                return false;
            }
            if(this.duplicateValidation && this.tags.some(e => e === this.tagValue )){
                this.errorMessage = 'No se pueden repetir los valores.';
                return false;
            }
            switch (this.typeValidation) {
                case 'email':
                    var emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; // Expresión regular de email
                    if(!emailRegex.test(this.tagValue)){
                        this.errorMessage = 'Formato de correo invalido.';
                        return false;
                    }
                default:
                    return true;
            }
        }
    },
    directives: {
        focus: {
            inserted: (el) => {
                el.focus()
            }
        }
    },
    mounted(){
        this.tags = this.values;
    }
}
</script>

<style lang="scss" scoped>
    .tags-input-container{
        width: 100%;
        padding: 10px;
        background-color: rgba($color: #fff, $alpha: 1.0);
        border: #666666 1px solid;
        border-radius: 5px;
    }
    input {
        padding: 5px 5px;
        border: 0;
        outline: none;
        background-color: transparent;
        margin-right: 5px;
        font-size: .8rem;
        border-radius: 5px;
    }
    input.error {
        background-color: #FC8B8B;
        font-size: .8rem;
    }
    .tag {
        float: left;
        padding: 3px 5px;
        background-color: #FFF9A9;
        border-radius: 5px;
        margin-right: 5px;

        &:hover{
            background-color: #F2E84A;
            cursor: pointer;
        }

        input {
            font-size: inherit;
            padding: 0;
        }

        span:first-child{
            margin-right: 8px;
        }

        svg {
            color: #666;
            &:hover{
                color: #333;
            }
        }
    }
    span.error {
        font-size: .7rem;
        color: #CE2A2A;
    }
</style>
