/*global exports */
/*!
 * emoji
 *
 * This file auto create by `bin/create_emoji_js.py`.
 * Emoji\'s table come from <a href="http://code.iamcal.com/php/emoji/">http://code.iamcal.com/php/emoji/</a>
 *
 * Copyright(c) 2012 - 2014 fengmk2 <fengmk2@gmail.com>
 * MIT Licensed
 */

;(function (name, definition) {
  // Come from eventproxy: https://github.com/JacksonTian/eventproxy/blob/master/lib/eventproxy.js#L7

  // this is considered "safe":
  var hasDefine = typeof define === 'function';
  var hasExports = typeof module !== 'undefined' && module.exports;

  if (hasDefine) {
    // AMD Module or CMD Module
    define(definition);
  } else if (hasExports) {
    // Node.js Module
    module.exports = definition();
  } else {
    // Assign to common namespaces or simply the global object (window)
    this[name] = definition();
  }
})('jEmoji', function () {

var jEmoji = {};

/**
 * Emoji code map.
 *
 * format:
 *   Unified: [unified_unicode, title, classname, DoCoMo, KDDI, Softbank, Google]'
 *
 * @type {Object}
 */
var EMOJI_MAP = jEmoji.EMOJI_MAP = {
  // missing
  "đŹ": ["U+1F46C", "man and man holding hands", "1f46c", ["-", "-"], ["-", "-"], ["îš", "U+E428"], ["óŸ ", "U+FE1A0"]],
  "đ­": ["U+1F46D", "woman and woman holding hands", "1f46d", ["-", "-"], ["-", "-"], ["îš", "U+E428"], ["óŸ ", "U+FE1A0"]],
  "đČ": ["U+1F332", "evergreen tree", "1f332", ["-", "-"], ["î­", "U+EB49"], ["î", "U+E305"], ["óŸ", "U+FE04D"]],
  "đł": ["U+1F333", "deciduous tree", "1f333", ["-", "-"], ["î­", "U+EB49"], ["î", "U+E305"], ["óŸ", "U+FE04D"]],
  "đ":  ["U+1F34B", "lemon", "1f34b", ["-", "-"], ["îȘș", "U+EABA"], ["î", "U+E346"], ["óŸ", "U+FE052"]],
  "đ": ["U+1F60E", "smiling face with sunglasses", "1f60e", ["îŠ", "U+E726"], ["î", "U+E5C4"], ["î", "U+E106"], ["óŸ§", "U+FE327"]],
  "đ":  ["U+1F600", "grinning face", "1f600", ["î", "U+E753"], ["îź", "U+EB80"], ["î", "U+E404"], ["óŸł", "U+FE333"]],
  // table.html
