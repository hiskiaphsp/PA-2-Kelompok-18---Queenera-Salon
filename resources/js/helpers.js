export function asset(url) {
    const baseUrl = document
        .querySelector('meta[name="asset-url"]')
        .getAttribute("content");
    return baseUrl + "/" + url;
}
