(function($) {
    wp.customize.controlConstructor['repeater'] = wp.customize.Control.extend({
        ready: function() {
            var control = this;
            this.container.on('click', '.my-theme-repeater-add', function() {
                control.addItem();
            });

            this.container.on('click', '.my-theme-repeater-remove', function() {
                $(this).closest('.my-theme-repeater-item').remove();
                control.updateValue();
            });

            this.container.on('input', 'input, textarea', function() {
                control.updateValue();
            });

            this.initRepeater();
        },

        initRepeater: function() {
            var control = this;
            var value = this.setting.get();
            var items = [];

            try {
                items = JSON.parse(value);
            } catch (e) {
                items = [];
            }

            if (Array.isArray(items)) {
                items.forEach(function(item) {
                    control.addItem(item);
                });
            }
        },

        addItem: function(item) {
            item = item || { q: '', a: '' };
            
            // Proper escaping for security
            var q = $('<div/>').text(item.q).html();
            var a = $('<div/>').text(item.a).html();

            var html = `
                <div class="my-theme-repeater-item" style="border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; background: #fff;">
                    <input type="text" class="repeater-q" placeholder="Question" value="${q}" style="width: 100%; margin-bottom: 5px;" />
                    <textarea class="repeater-a" placeholder="Answer" style="width: 100%; height: 60px;">${a}</textarea>
                    <button type="button" class="button my-theme-repeater-remove" style="margin-top: 5px; color: #d63638; border-color: #d63638;">Remove</button>
                </div>
            `;
            this.container.find('.my-theme-repeater-items').append(html);
        },

        updateValue: function() {
            var items = [];
            this.container.find('.my-theme-repeater-item').each(function() {
                items.push({
                    q: $(this).find('.repeater-q').val(),
                    a: $(this).find('.repeater-a').val()
                });
            });
            this.setting.set(JSON.stringify(items));
        }
    });
})(jQuery);
