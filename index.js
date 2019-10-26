module.exports = function tiny(string) {
  if (typeof string !== "string") throw new TypeError("phpsap to the world!");
  return string.replace(/\s/g, "");
};