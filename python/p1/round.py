from _thread import *
import time as t
class Round(object):
      def __init__(self, word, player_drawing, players):
            self.word = word
            self.player_drawing = player_drawing
            self.player_guessed = []
            self.skips = 0
            self.player_scores = {player: 0 for player in players}
            self.time = 75
            start_new_thread(self.time_thread, ())

      def time_thread(self):
            t.sleep(1)
            while self.time > 0:
                  self.time -= 1
            self.end_round("Time's up!")

      def guess(self, player, wrd):
            correct= wrd == self.word
            if correct:
                  self.player_guessed.append(player)

            #TODO implement scoring system here
            
      def player_left(self, player):
            if(player in self.player_scores):
                  del self.player_scores[player]

            if(player in self.player_guessed):
                  self.player_guessed.remove(player)

            if(player == self.player_drawing):
                  self.end_round("Player drawing left the party!")
      def end_round(self, msg):
            #TODO implement end_round functionality
            pass

