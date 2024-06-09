import speech_recognition as sr
import pygame
import os
import time
import threading

def recognize_speech():
    recognizer = sr.Recognizer()
    with sr.Microphone() as source:
        print("Listening...")
        audio = recognizer.listen(source)
    try:
        command = recognizer.recognize_google(audio)
        print(f"You said: {command}")
        return command.lower()
    except sr.UnknownValueError:
        print("Sorry, I could not understand the audio")
        return ""
    except sr.RequestError:
        print("Could not request results; check your network connection")
        return ""

def play_music(music_file):
    if not os.path.isfile(music_file):
        print(f"The file {music_file} does not exist.")
        return

    pygame.mixer.init()
    pygame.mixer.music.load(music_file)
    pygame.mixer.music.play()
    print(f"Playing {music_file}...")

def pause_music():
    if pygame.mixer.music.get_busy():
        pygame.mixer.music.pause()
        print("Music paused.")

def resume_music():
    if pygame.mixer.music.get_busy():
        pygame.mixer.music.unpause()
        print("Music resumed.")

def stop_music():
    if pygame.mixer.music.get_busy():
        pygame.mixer.music.stop()
        print("Music stopped.")

def listen_for_commands():
    while True:
        command = recognize_speech()
        if "play music" in command:
            play_music(music_file)
        elif "pause music" in command:
            pause_music()
        elif "resume music" in command:
            resume_music()
        elif "stop music" in command:
            stop_music()
            break

if __name__ == "__main__":
    music_file = "GONE.mp3"
    
    # Start listening for commands
    command_thread = threading.Thread(target=listen_for_commands)
    command_thread.start()
