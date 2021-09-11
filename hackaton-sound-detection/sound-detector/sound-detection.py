from IPython.display import Audio
from scipy.io import wavfile

import audioop
import csv
import matplotlib.pyplot as plt
import math
import numpy as np
import os
import pyaudio
import scipy.signal
import struct
import tensorflow as tf
import tensorflow_hub as hub
import time
import wave


### Defining constant ###
SOUND_THRESHOLD = 100
SHORT_NORMALIZE = (1.0/32768.0)
chunk = 1024
FORMAT = pyaudio.paInt16
CHANNELS = 1
RATE = 16000
swidth = 2
TIMEOUT_LENGTH = 5

RECORDED_SOUND_DIRECTORY = r'recorded_sounds'

# Load the model.
model = hub.load('https://tfhub.dev/google/yamnet/1')

class Recorder:

    @staticmethod
    def rms(frame):
        count = len(frame) / swidth
        format = "%dh" % (count)
        shorts = struct.unpack(format, frame)

        sum_squares = 0.0
        for sample in shorts:
            n = sample * SHORT_NORMALIZE
            sum_squares += n * n
        rms = math.pow(sum_squares / count, 0.5)

        return rms * 1000

    def __init__(self):
        self.p = pyaudio.PyAudio()
        self.stream = self.p.open(format=FORMAT,
                                  channels=CHANNELS,
                                  rate=RATE,
                                  input=True,
                                  output=True,
                                  frames_per_buffer=chunk)

    def record(self):
        print('Noise detected, recording beginning')
        rec = []
        current = time.time()
        end = time.time() + TIMEOUT_LENGTH

        while current <= end:

            data = self.stream.read(chunk)
            if self.rms(data) >= SOUND_THRESHOLD: end = time.time() + TIMEOUT_LENGTH

            current = time.time()
            rec.append(data)
        self.write(b''.join(rec))

    def write(self, recording):
        n_files = len(os.listdir(RECORDED_SOUND_DIRECTORY))

        filename = os.path.join(RECORDED_SOUND_DIRECTORY, '{}.wav'.format(n_files))

        wf = wave.open(filename, 'wb')
        wf.setnchannels(CHANNELS)
        wf.setsampwidth(self.p.get_sample_size(FORMAT))
        wf.setframerate(RATE)
        wf.writeframes(recording)
        wf.close()
        print('Written to file: {}'.format(filename))
        print('Returning to listening')



    def listen(self):
        print('Listening beginning')
        while True:
            input = self.stream.read(chunk)
            rms_val = self.rms(input)
            if rms_val > SOUND_THRESHOLD:
                
                print(f' {rms_val} - Sound DETECTED')
                self.record()


if __name__ == '__main__':

    a = Recorder()

    try:
        a.listen()
    except KeyboardInterrupt:
        print('You pressed Ctrl + c : Program exit.')


