new Vue({
    el: '#question-create-app',
    data: {
      question: null,
      option: {
          text: null,
          isRight: false
      },
      options: [{
          text: null,
          isRight: false
      }],
    },
    methods: {
        addOption() {
            this.options.push({
                text: this.text,
                isRight: this.isRight
            });
        },
        removeOption(i) {
            this.options.splice(i, 1);
        },
        save() {
            $.post({
                url: '/question/create-questions',
                data: {text: this.text, options: this.options},
                success: function (result) {
                    console.log(result);
                },
                error: function () {
                    console.log('Create question error!');
                }
            });
        }
    }
});