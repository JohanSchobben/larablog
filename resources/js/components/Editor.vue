<template>
    <div>
        <editor-menu-bar :editor="editor" v-slot="{ commands, isActive }">
            <div>
                <div class="btn-group">
                    <button class="btn btn-sm font-weight-bolder"
                            :class="{'btn-dark': isActive.bold()}"
                            @click="commands.bold">
                        <span class="material-icons">
                            format_bold
                        </span>
                    </button>
                    <button class="btn btn-sm font-weight-bolder"
                            :class="{'btn-dark': isActive.italic()}"
                            @click="commands.italic()">
                        <span class="material-icons">
                            format_italic
                        </span>
                    </button>
                    <button class="btn btn-sm font-weight-bolder"
                            :class="{'btn-dark': isActive.underline()}"
                            @click="commands.underline()">
                        <span class="material-icons">
                            format_underlined
                        </span>
                    </button>
                </div>
                <div class="btn-group">
                    <button class="btn font-weight-bolder"
                        :class="{'btn-dark': isActive.heading({level:1})}"
                        @click="commands.heading({level:1})">
                        <span>H1</span>
                    </button>
                    <button class="btn font-weight-bolder"
                        :class="{'btn-dark': isActive.heading({level:2})}"
                        @click="commands.heading({level:2})">
                        <span>H2</span>
                    </button>
                    <button class="btn font-weight-bolder"
                        :class="{'btn-dark': isActive.heading({level:3})}"
                        @click="commands.heading({level:3})">
                        <span>H3</span>
                    </button>
                    <button class="btn font-weight-bolder"
                        :class="{'btn-dark': isActive.heading({level:4})}"
                        @click="commands.heading({level:4})">
                        <span>H4</span>
                    </button>
                </div>
                <div class="btn-group">
                    <button class="btn font-weight-bolder"
                            :class="{'btn-dark': isActive.link()}"
                            @click="commands.link">
                        <span class="material-icons">
                            insert_link
                        </span>
                    </button>
                    <button class="btn font-weight-bolder"
                            :class="{'btn-dark': isActive.code()}"
                            @click="commands.code">
                        <span class="material-icons">
                            code
                        </span>
                    </button>
                    <button class="btn font-weight-bolder"
                            :class="{'btn-dark': isActive.blockquote()}"
                            @click="commands.blockquote">
                        <span class="material-icons">
                            format_quote
                        </span>
                    </button>
                </div>
                <div class="btn-group">
                    <button class="btn font-weight-bolder"
                            :class="{'btn-dark': isActive.bullet_list()}"
                            @click="commands.bullet_list">
                        <span class="material-icons">
                            list
                        </span>
                    </button>
                    <button class="btn font-weight-bolder"
                            :class="{'btn-dark': isActive.ordered_list()}"
                            @click="commands.ordered_list">
                        <span class="material-icons">
                            list
                        </span>
                    </button>

                </div>
            </div>
        </editor-menu-bar>
        <EditorContent class="editor" :editor="editor"/>
    </div>
</template>
<script>
    import {Editor, EditorContent, EditorMenuBar} from 'tiptap';
    import {
        Heading,
        Italic,
        Bold,
        Underline,
        Link,
        HardBreak,
        Code,
        CodeBlock,
        Blockquote,
        OrderedList,
        BulletList, ListItem
    } from "tiptap-extensions";

    export default {
        components: {
            EditorContent,
            EditorMenuBar
        },
        mounted() {
            this.editor = new Editor({
                extensions: [
                    new Bold(),
                    new Heading({
                        levels: [1, 2, 3, 4]
                    }),
                    new Italic(),
                    new Underline(),
                    new Link(),
                    new ListItem(),
                    new HardBreak(),
                    new Code(),
                    new CodeBlock(),
                    new Blockquote(),
                    new BulletList(),
                    new OrderedList()
                ],
                content: "foo"
            })
        },
        data() {
            return {
                editor: null,
                console: console
            }
        },
        beforeDestroy() {
            this.editor.destroy()
        },
    }
</script>
<style>
    .ProseMirror:focus {
        min-height: 400px;
    }
</style>
