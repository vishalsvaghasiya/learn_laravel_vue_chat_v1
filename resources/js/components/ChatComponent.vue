<template>
    <v-layout row>
        <v-flex xs12 sm6 offset-sm3>
            <v-card class="chat-card">

                <v-list>
                    <v-subheader
                    >
                        Group Chat
                    </v-subheader>
                    <v-divider></v-divider>
                    <div v-for="(message , index) in allMessages">
                        <v-layout
                            :align-end="(user.id === message.user.id)"
                            column>
                            {{ message.user.name }}
                            {{ message.message }}
                        </v-layout>

                    </div>

                </v-list>
            </v-card>
        </v-flex>

        <v-footer
            height="auto"
            fixed
            color="grey"
        >
            <v-layout row>
                <v-flex xs6 offset-xs3 justify-center align-center>
                    <v-text-field
                        rows=2
                        v-model="message"
                        label="Ent    er Message"
                        single-line
                        @keyup.enter="sendMessage"
                    ></v-text-field>
                </v-flex>

                <v-flex xs4>
                    <v-btn
                        @click="sendMessage"
                        dark class="mt-3 ml-2 white--text" small color="green">send
                    </v-btn>
                </v-flex>
            </v-layout>
        </v-footer>
    </v-layout>
</template>

<script>
import Echo from "laravel-echo";

export default {
    props: ['user'],
    data() {
        return {
            message: null,
            allMessages: [],
        }
    },
    methods: {
        sendMessage() {
            if (!this.message) {
                return alert('please enter message');
            }

            // this.allMessages.push(this.message);

            axios.post('/messages', {
                message: this.message
            }).then(response => {
                console.log(response.data);
                this.message = null;
                this.fetchMessages();
            })
        },
        fetchMessages() {
            axios.get('/messages').then(response => {
                console.log(response.data);
                this.allMessages = response.data;
            })
        }
    },
    created() {
        this.fetchMessages();
    },
    mounted() {
        window.Echo.private('lchat').listen('MessageSent', (e) => {
            console.log(e);
            console.log(e.message);
            this.allMessages.push(e.message);
            this.fetchMessages();
        })
    }
}
</script>

<style scoped>
.chat-card {
    margin-bottom: 140px;
}

.floating-div {
    position: fixed;
}

.chat-card img {
    max-width: 300px;
    max-height: 200px;
}
</style>
