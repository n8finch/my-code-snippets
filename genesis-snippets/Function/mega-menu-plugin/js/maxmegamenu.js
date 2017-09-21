/*jslint browser: true, white: true, this: true */
/*global console,jQuery,megamenu,window,navigator*/

/*! Max Mega Menu jQuery Plugin */
(function($) {
    "use strict";

    $.maxmegamenu = function(menu, options) {
        var plugin = this;
        var $menu = $(menu);

        var defaults = {
            event: $menu.attr("data-event"),
            effect: $menu.attr("data-effect"),
            effect_speed: parseInt($menu.attr("data-effect-speed")),
            panel_width: $menu.attr("data-panel-width"),
            panel_inner_width: $menu.attr("data-panel-inner-width"),
            second_click: $menu.attr("data-second-click"),
            vertical_behaviour: $menu.attr("data-vertical-behaviour"),
            document_click: $menu.attr("data-document-click"),
            breakpoint: $menu.attr("data-breakpoint")
        };

        plugin.settings = {};

        /**
         * Hides a single panel (sub menu)
         */
        plugin.hidePanel = function(anchor, immediate) {
            if (!immediate && plugin.settings.effect == 'slide' ) {
                anchor.siblings(".mega-sub-menu").animate({"height":"hide"}, plugin.settings.effect_speed, function() {
                    anchor.siblings(".mega-sub-menu").css("display", "");
                    anchor.parent().removeClass("mega-toggle-on").triggerHandler("close_panel");
                });
                return;
            }

            if (immediate) {
                anchor.siblings(".mega-sub-menu").css("display", "none").delay(plugin.settings.effect_speed).queue(function(){
                    $(this).css("display", "").dequeue();
                });
            }

            anchor.parent().removeClass("mega-toggle-on").triggerHandler("close_panel");
        };

        /**
         * Hide all open sub menus
         */
        plugin.hideAllPanels = function() {
            $(".mega-toggle-on > a.mega-menu-link", $menu).each(function() {
                plugin.hidePanel($(this), false);
            });
        };

        /**
         * For flyout menus: Hide open sub menus at the same level as the sub menu that"s being opened
         */
        plugin.hideSiblingPanels = function(anchor, immediate) {
            // jQuery 1.7.2 compatibility for themes/plugins that load old versions of jQuery
            if ($.fn.addBack !== undefined) {
                anchor.parent().siblings().find(".mega-toggle-on").addBack().children("a").each(function() { // all open children of open siblings
                    plugin.hidePanel($(this), immediate);
                });
            } else {
                anchor.parent().siblings().find(".mega-toggle-on").andSelf().children("a").each(function() { // all open children of open siblings
                    plugin.hidePanel($(this), immediate);
                });
            }
        };

        /**
         * Returns true if the browser width is wider than the Responsive Breakpoint (set in Menu Theme Editor)
         */
        plugin.isDesktopView = function() {
            return $(window).width() >= plugin.settings.breakpoint;
        };

        /**
         *
         */
        plugin.isMobileView = function() {
            return !plugin.isDesktopView();
        };

        /**
         * Display a single panel. Also handles closing of panels that are currently open and need to be closed.
         */
        plugin.showPanel = function(anchor) {
            if (plugin.isMobileView() && anchor.parent().hasClass("mega-hide-sub-menu-on-mobile")) {
                return;
            }

            if (plugin.isDesktopView() && ($menu.hasClass("mega-menu-horizontal") || $menu.hasClass("mega-menu-vertical"))) {
                plugin.hideSiblingPanels(anchor, true);
            }

            if ((plugin.isMobileView() && $menu.hasClass("mega-keyboard-navigation")) || plugin.settings.vertical_behaviour === "accordion") {
                plugin.hideSiblingPanels(anchor, false);
            }

            // apply dynamic width and sub menu position
            if (anchor.parent().hasClass("mega-menu-megamenu") && $(plugin.settings.panel_width).length) {
                var submenu_offset = $menu.offset();
                var target_offset = $(plugin.settings.panel_width).offset();

                anchor.siblings(".mega-sub-menu").css({
                    width: $(plugin.settings.panel_width).outerWidth(),
                    left: (target_offset.left - submenu_offset.left) + "px"
                });
            }

            // apply inner width to sub menu by adding padding to the left and right of the mega menu
            if (anchor.parent().hasClass("mega-menu-megamenu") && plugin.settings.panel_inner_width && plugin.settings.panel_inner_width.length > 0) {
                var target_width = 0;

                if ($(plugin.settings.panel_inner_width).length) {
                    // jQuery selector
                    target_width = parseInt($(plugin.settings.panel_inner_width).width(), 10);
                } else {
                    // we"re using a pixel width
                    target_width = parseInt(plugin.settings.panel_inner_width, 10);
                }

                var submenu_width = parseInt(anchor.siblings(".mega-sub-menu").innerWidth(), 10);

                if (target_width > 0 && target_width < submenu_width) {
                    anchor.siblings(".mega-sub-menu").css({
                        "paddingLeft": (submenu_width - target_width) / 2 + "px",
                        "paddingRight": (submenu_width - target_width) / 2 + "px"
                    });
                }
            }

            // apply jQuery transition (only if the effect is set to "slide", other transitions are CSS based)
            if ( plugin.settings.effect == "slide" ) {
                anchor.siblings(".mega-sub-menu").css("display", "none").animate({'height':'show'}, plugin.settings.effect_speed);
            }

            anchor.parent().addClass("mega-toggle-on").triggerHandler("open_panel");
        };

        /**
         * Open sub menus on click
         */
        var bindClickEvents = function() {
            var dragging = false;

            $(document).on({
                "touchmove": function(e) { dragging = true; },
                "touchstart": function(e) { dragging = false; }
            });

            $(document).on("click touchend", function(e) { // hide menu when clicked away from
                if (!dragging && plugin.settings.document_click === "collapse" && ! $(e.target).closest(".mega-menu li").length ) {
                    plugin.hideAllPanels();
                }
                dragging = false;
            });

            var items_with_submenus = $("li.mega-menu-megamenu.mega-menu-item-has-children > a.mega-menu-link, li.mega-menu-flyout.mega-menu-item-has-children > a.mega-menu-link, li.mega-menu-flyout li.mega-menu-item-has-children > a.mega-menu-link", menu);

            items_with_submenus.on("click.megamenu touchend.megamenu", function(e) {
                if (dragging) {
                    return;
                }
                if (plugin.isMobileView() && $(this).parent().hasClass("mega-hide-sub-menu-on-mobile")) {
                    return; // allow all clicks on parent items when sub menu is hidden on mobile
                }

                // check for second click
                if (plugin.settings.second_click === "go" || $(this).parent().hasClass("mega-click-click-go")) {
                    if (!$(this).parent().hasClass("mega-toggle-on")) {
                        e.preventDefault();
                        plugin.showPanel($(this));
                    }
                } else {
                    e.preventDefault();

                    if ($(this).parent().hasClass("mega-toggle-on")) {
                        plugin.hidePanel($(this), false);
                    } else {
                        plugin.showPanel($(this));
                    }
                }
            });
        };

        /**
         * Open sub menus on hover
         */
        var bindHoverEvents = function() {
            $("li.mega-menu-item-has-children", menu).not("li.mega-menu-megamenu li.mega-menu-item-has-children", menu).on({
                mouseenter: function() {
                    plugin.unbindClickEvents();
                    plugin.showPanel($(this).children("a"));
                },
                mouseleave: function() {
                    if ($(this).hasClass("mega-toggle-on")) {
                        plugin.hidePanel($(this).children("a"), false);
                    }
                }
            });
        };

        /**
         * Open sub menus on hoverIntent
         */
        var bindHoverIntentEvents = function() {
            $("li.mega-menu-item-has-children", menu).not("li.mega-menu-megamenu li.mega-menu-item-has-children", menu).hoverIntent({
                over: function () {
                    plugin.unbindClickEvents();
                    plugin.showPanel($(this).children("a"));
                },
                out: function () {
                    if ($(this).hasClass("mega-toggle-on")) {
                        plugin.hidePanel($(this).children("a"), false);
                    }
                },
                timeout: megamenu.timeout,
                interval: megamenu.interval
            });
        };

        /**
         *
         */
        plugin.unbindClickEvents = function() {
            $("a.mega-menu-link").off("click.megamenu touchend.megamenu");
        };

        /**
         * Handle keyboard navigation of the menu. Highlight focused items.
         */
        plugin.keyboardNavigation = function() {
            var tab_key = 9;
            var escape_key = 27;

            $("body").on("keyup", function(e) {
                var keyCode = e.keyCode || e.which;

                if (keyCode === escape_key) {
                    $menu.removeClass("mega-keyboard-navigation");
                    plugin.hideAllPanels();
                }

                if ( $menu.hasClass("mega-keyboard-navigation") && ! $(event.target).closest(".mega-menu li").length ) {
                    $menu.removeClass("mega-keyboard-navigation");
                    plugin.hideAllPanels();
                }
            });

            $menu.parent().on("keyup", function(e) {
                var keyCode = e.keyCode || e.which;
                var active_link = $(e.target);

                if (keyCode === tab_key) {
                    $menu.addClass("mega-keyboard-navigation");

                    if ( active_link.parent().hasClass("mega-menu-item-has-children") ) { // menu item with sub menu
                        plugin.showPanel(active_link);
                    } else if ( active_link.parent().parent().hasClass("mega-menu") ) { // top level item with no children
                        plugin.hideAllPanels();
                    }

                    if ( active_link.hasClass("mega-menu-toggle") ) {
                        active_link.toggleClass("mega-menu-open");
                    }
                }
            });
        };

        /**
         * Remove all events from mega menu
         */
        plugin.unbindAllEvents = function() {
            $("ul.mega-sub-menu, li.mega-menu-item, a.mega-menu-link", menu).off().unbind();
        };

        /**
         * Bind events to the menu items to allow it to be opened on click, hover or hover intent.
         * The event will always be "click" if the current view is "mobile"
         */
        plugin.bindMegaMenuEvents = function() {
            if (plugin.isDesktopView() && plugin.settings.event === "hover_intent") {
                bindHoverIntentEvents();
            }

            if (plugin.isDesktopView() && plugin.settings.event === "hover") {
                bindHoverEvents();
            }

            bindClickEvents(); // always bind click events for touch screen devices
        };

        /**
         * Monitor the width of the browser so we can tell when the browser has been resized to the point
         * where the mobile menu is displayed, and vice versa
         */
        plugin.monitorView = function() {
            if (plugin.isDesktopView()) {
                $menu.data("view", "desktop");
            } else {
                $menu.data("view", "mobile");
                plugin.switchToMobile();
            }

            plugin.checkWidth();

            $(window).resize(function() {
                plugin.checkWidth();
            });
        };

        /**
         * Monitor the width of the browser and call functions when menu switches between desktop and mobile view
         */
        plugin.checkWidth = function() {
            if ( plugin.isMobileView() && $menu.data("view") === "desktop" ) {
                $menu.data("view", "mobile");
                plugin.switchToMobile();
            }

            if ( plugin.isDesktopView() && $menu.data("view") === "mobile" ) {
                $menu.data("view", "desktop");
                plugin.switchToDesktop();
            }
        };

        /**
         * Reverse right aligned menu items so that they appear in the same order on mobile as they do on desktop
         */
        plugin.reverseRightAlignedItems = function() {
            $menu.append($menu.children("li.mega-item-align-right").get().reverse());
        };

        /**
         * Called when the menu view loads in mobile, or switches from desktop to mobile
         */
        plugin.switchToMobile = function() {
            plugin.unbindAllEvents();
            plugin.bindMegaMenuEvents();
            plugin.reverseRightAlignedItems();
        };

        /**
         * Called when the menu view switches from mobile to desktop
         */
        plugin.switchToDesktop = function() {
            plugin.unbindAllEvents();
            plugin.bindMegaMenuEvents();
            plugin.reverseRightAlignedItems();
        };

        /**
         * Initialise the mega menu
         */
        plugin.init = function() {
            $menu.triggerHandler("before_mega_menu_init");
            plugin.settings = $.extend({}, defaults, options);
            $menu.removeClass("mega-no-js");

            // mobile menu
            $menu.siblings(".mega-menu-toggle").on("click", function(e) {
                if ( $(e.target).is(".mega-menu-toggle-block, .mega-menu-toggle") ) {
                    $(this).toggleClass("mega-menu-open");
                }
            });

            plugin.unbindAllEvents();
            plugin.bindMegaMenuEvents();
            plugin.monitorView();
            plugin.keyboardNavigation();
            $menu.triggerHandler("after_mega_menu_init");
        };

        plugin.init();
    };

    $.fn.maxmegamenu = function(options) {
        return this.each(function() {
            if (undefined === $(this).data("maxmegamenu")) {
                var plugin = new $.maxmegamenu(this, options);
                $(this).data("maxmegamenu", plugin);
            }
        });
    };

    $(function() {
        $(".mega-menu").maxmegamenu();
    });
})(jQuery);