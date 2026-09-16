<script setup></script>
<template>
    <form class="contact-form">
        <div class="flex flex-col gap-4 bg-[var(--bg-basic)] border border-[var(--text-primary)] rounded-lg py-8 px-8">
            <div class="field">
                <label for="contact-name">Ваше ім’я</label>
                <input id="contact-name" name="name" type="text" placeholder="Марія" required />
            </div>
            <div class="field">
                <label for="contact-phone">Телефон або Telegram </label>
                <input id="contact-phone" name="phone" type="tel" placeholder="+38 000 000 00 00 " required />
            </div>
            <div class="field">
                <label for="contact-message">З чим хочете звернутися?</label>
                <textarea id="contact-message" name="message" rows="5" placeholder="Кілька слів про ваш запит ..."></textarea>
            </div>
            <button type="submit">Надіслати</button>
        </div>
    </form>
</template>