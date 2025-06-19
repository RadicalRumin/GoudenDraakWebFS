import { ref, onMounted } from 'vue';

const tableData = ref(null);

export function getCookie(name: string) {
    const cookies = document.cookie.split('; ').reduce((acc: Record<string, string>, cookieStr) => {
        const [key, val] = cookieStr.split('=');
        acc[key] = val;
        return acc;
    }, {});

    if (!cookies[name]) return null;

    try {
        const jsonString = decodeURIComponent(cookies[name]);
        return JSON.parse(jsonString);
    } catch (e) {
        console.error('Failed to parse cookie', e);
        return null;
    }
}

export function refreshCookie() {
    tableData.value = getCookie('restaurant_auth');
}

// Only one-time listener setup
let isSetup = false;

export function useRestaurantCookie() {
    if (!isSetup) {
        onMounted(() => {
            refreshCookie();

        });

        isSetup = true;
    }

    return {
        tableData,
        refreshCookie,
    };
}
